<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // $cours = Cour::all();
        $cours = Cour::paginate(15);
        return view('admin.cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|min:3',
            'description' => 'required|string',
            'duration' => 'required|integer',
            // 'price' => 'required|numeric|min:0',
            'price' => 'numeric|min:0',
        ]);

        $currentDateTime = date('Y-m-d H:i:s'); // ou now()

        $cours = Cour::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'duration' => $validatedData['duration'],
            'price' => $validatedData['price'],
            'updated_at' => $currentDateTime,
            'created_at' => $currentDateTime,
        ]);

        return redirect()->route('cours.index')
            ->with('success', 'Cours créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $cour = Cour::find($id); // Assuming Cours is your model name
        // $cour = Cour::with(['lessons', ])->find($id);
        $cour = Cour::with(['lessons'])->find($id);

        if (!$cour) {
            return redirect()->route('admin.cours.index')->with('error', 'Cours non trouvé.');
        }

        return view('admin.cours.show', compact('cour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cour $cour):View
    {
        return $this->showForm($cour);
    }

    protected function showForm(Cour $cour = new Cour):View{
        return view("admin.cours.edit",[
            'cour' =>$cour,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cour $cour)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $cour = $cour->update($validated);
        // die;
        $cours = Cour::all();

        return view('admin.cours.index', compact('cours'));

        // return redirect()->route('cours.show', $cour)->with('success', 'Le cours a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cour $cour)
    {
        try {
            $cour->delete();
            return redirect()->route('cours.index')->with('success', 'Le cours a été supprimé avec succès.');
        } catch (\Exception $e) {
            // Gestion de l'erreur
            return redirect()->route('cours.index')->with('error', 'Une erreur est survenue lors de la suppression du cours.');
        }
    }

    public function subscribe($id)
    {
        // Vérifiez si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('register')->with('error', 'Vous devez être connecté pour vous abonner à un cours.');
        }

        // Trouver le cours par ID
        $cour = Cour::findOrFail($id);

        // Logique pour abonner l'utilisateur au cours
        $user = Auth::user();

        // Abonner l'utilisateur au cours
        $cour->users()->attach($user->id);

        return redirect()->back()->with('success', 'Vous êtes maintenant abonné au cours : ' . $cour->title);
    }


}

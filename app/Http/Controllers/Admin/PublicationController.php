<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

use App\Http\Controllers\StorageController;
use App\Models\Publication;
use App\Models\PublicationsType;

class PublicationController extends VoyagerBaseController
{
    /**
     * Show the create form.
     */
    public function create(Request $request)
    {
        $this->authorize('add', app(Publication::class));

        $publication = new Publication();
        $types       = PublicationsType::orderBy('title')->get();

        return view('admin.publications.edit-add', compact('publication', 'types'));
    }

    /**
     * Show a single publication (read).
     */
    public function show(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        $this->authorize('read', $publication);

        $type = PublicationsType::find($publication->publications_type_id);

        return view('admin.publications.read', compact('publication', 'type'));
    }

    /**
     * Store a new publication.
     */
    public function store(Request $request)
    {
        $this->authorize('add', app(Publication::class));

        $data = $this->validateData($request);

        $publication                       = new Publication();
        $publication->publications_type_id = $data['publications_type_id'];
        $publication->user_id              = Auth::id();
        $publication->title                = $data['title'];
        $publication->tags                 = $data['tags'] ?? null;
        $publication->description          = $data['description'] ?? null;
        $publication->enact_date           = $data['enact_date'] ?? null;
        $publication->publish_date         = $data['publish_date'] ?? null;
        $publication->highlight            = $request->boolean('highlight') ? 1 : 0;
        $publication->view                 = 0;
        $publication->file                 = $this->handleFile($request, null);

        $publication->save();

        return redirect()->route('voyager.publications.index')->with([
            'message'    => 'Publicación creada correctamente.',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Show the edit form.
     */
    public function edit(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        $this->authorize('edit', $publication);

        $types = PublicationsType::orderBy('title')->get();

        return view('admin.publications.edit-add', compact('publication', 'types'));
    }

    /**
     * Update an existing publication.
     */
    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        $this->authorize('edit', $publication);

        $data = $this->validateData($request);

        $publication->publications_type_id = $data['publications_type_id'];
        $publication->title                = $data['title'];
        $publication->tags                 = $data['tags'] ?? null;
        $publication->description          = $data['description'] ?? null;
        $publication->enact_date           = $data['enact_date'] ?? null;
        $publication->publish_date         = $data['publish_date'] ?? null;
        $publication->highlight            = $request->boolean('highlight') ? 1 : 0;
        $publication->file                 = $this->handleFile($request, $publication->file);

        $publication->save();

        return redirect()->route('voyager.publications.index')->with([
            'message'    => 'Publicación actualizada correctamente.',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Validate the incoming request.
     */
    protected function validateData(Request $request): array
    {
        return $request->validate([
            'publications_type_id' => 'required|exists:publications_types,id',
            'title'                => 'required|string|max:255',
            'tags'                 => 'nullable|string|max:255',
            'description'          => 'nullable|string',
            'enact_date'           => 'nullable|date',
            'publish_date'         => 'nullable|date',
            'file'                 => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:51200',
        ]);
    }

    /**
     * Save the uploaded file through the StorageController and return the
     * JSON value stored in the `file` column. Keeps the current value when
     * no new file is uploaded.
     */
    protected function handleFile(Request $request, ?string $current): string
    {
        if (!$request->hasFile('file')) {
            return $current ?? '[]';
        }

        $uploaded = $request->file('file');
        $path     = (new StorageController())->file($uploaded, 'publications');

        return json_encode([[
            'download_link' => $path,
            'original_name' => $uploaded->getClientOriginalName(),
        ]]);
    }
}

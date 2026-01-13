<?php 

namespace App\Services;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Collection;

class WorkspaceService
{

   public function create(array $data) : Workspace
   {
        return Workspace::create($data);
   }

   public function index(int $userId) : Collection
   {
       return Workspace::where('id', $userId)->get();
   }

   public function update(int $id , array $data) : Workspace
   {
       $workspace = Workspace :: findOrFail($id);
       $workspace -> update($data);

       return $workspace;
   }
}
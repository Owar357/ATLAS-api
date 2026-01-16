<?php 

namespace App\Services;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;


class ProjectService
{
   public function index(int $user_id): Collection
   {
      return Project::with('workspace')->get();
      
   }

    public function find(int $id): ?Model
   {
        return null;
   }


    public function create(array $data): Project
   {
      return Project :: create($data);
   }

    public function update(int $id , array $data): Project
   {
      $project = Project:: findOrFail($id);

      $project -> update($data);
      
      return $project; 
   }

   
    public function delete(Model $model):void 
   {
      //
   }

}

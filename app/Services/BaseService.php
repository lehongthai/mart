<?php
namespace App\Services;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/25/2017
 * Time: 11:43 PM
 */
abstract class BaseService implements InterfaceService
{
    protected $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function setData(Request $request)
    {
        // TODO: Implement setData() method.
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function all()
    {
        return $this->repository->all();
    }


}
@extends('backend.adminBase')


@section('content')

    <div>
        <h5 class="card-title" style="margin-left: 35px">Categories</h5>
        <div style="Margin: 10px">
            <a class="btn btn-primary" href="/admin/category/create" style="margin: 10px">Добавить</a>
        </div>
        <table class="table" style="margin: 30px">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <th scope="row">{{ $categorie->id }}</th>
                    <td> {{$categorie->title}} </td>
                    <td> <a type="button" href="/admin/category/delete/{{ $categorie->id }}"
                            class="btn btn-outline-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#disablebackdrop-{{ $categorie->id }}"><i class="bi bi-trash"></i></a>
                         <div class="modal fade" id="disablebackdrop-{{ $categorie->id }}" tabindex="-1"
                              data-bs-backdrop="false">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title">Disabled Backdrop</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         Точно удалить?
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Нет</button>
                                         <a type="button" href="/admin/category/delete/{{ $categorie->id }}" class="btn btn-primary">Удалить</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                    </td>
                    <td> <a href="/admin/category/edit/{{ $categorie->id }}" class="btn btn-outline-primary"><i class="bi bi-hammer"></i></a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    {{$categories->links('vendor.pagination.bootstrap-5')}}
@endsection

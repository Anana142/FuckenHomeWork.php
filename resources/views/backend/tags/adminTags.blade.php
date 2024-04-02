@extends('backend.adminBase')


@section('content')

    <div>
        <h5 class="card-title" style="margin-left: 35px">Tags</h5>
        <div style="Margin: 10px">
            <a class="btn btn-primary" href="/admin/create/tag" style="margin: 10px">Добавить</a>
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
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td> {{$tag->name}} </td>
                    <td> <a type="button" href="/admin/tag/{{ $tag->id }}/delete"
                            class="btn btn-outline-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#disablebackdrop-{{ $tag->id }}"><i class="bi bi-trash"></i></a>
                         <div class="modal fade" id="disablebackdrop-{{ $tag->id }}" tabindex="-1"
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
                                         <a type="button" href="/admin/tag/{{ $tag->id }}/delete" class="btn btn-primary">Удалить</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                    </td>
                    <td> <a href="/admin/tag/{{ $tag->id }}" class="btn btn-outline-primary"><i class="bi bi-hammer"></i></a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    {{$tags->links('vendor.pagination.bootstrap-5')}}
@endsection

@extends('template.painel_contato')
@section('title', 'Listagem de Contatos')
@section('content')
    <div class="row mb-3">
        <div class="col-lg-2">
            <a href="{{ route('contato.cadastro') }}" class="btn btn-primary">Cadastrar Contato</a>
            <a href="" class="btn btn-primary">Autenticar</a>
        </div>
    </div>



    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Contatos</h5>

            <!-- Default Table -->
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Contato</th>
                        <th scope="col">E-mail</th>
                        <th scope="col" colspan="2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contatos as $dados)
                        <tr>
                            <td>{{ $dados->nome }}</td>
                            <td>{{ $dados->contato }}</td>
                            <td>{{ $dados->email }}</td>
                            {{-- @if (session()->has('nome_usuario')){ --}}
                            <td>
                                <a href="{{ route('contato.detalhes', $dados->id) }}"><i class="bi bi-binoculars fs-3"
                                        title="Visualizar Contato" style="margin-inline-end: 10%;"></i></i></a>
                                <a href="{{ route('contato.exibi_edicao', $dados->id) }}"><i
                                        class="bi bi-pencil-square fs-3" title="Editar Contato"
                                        style="margin-inline-end: 10%;"></i></a>
                                <a href="{{ route('contato.deletar', $dados->id) }}"><i class="bi bi-trash fs-3"
                                        title="Excluir Contato"></i></a>
                            </td>
                            {{-- }@endif --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>





    <div class="modal fade" id="deletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir esse registro?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    @if (!empty($codigo_recebido))
                        <form method="POST" action="{{ route('contato.exclusao',$codigo_recebido) }}">
                    @endif
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    @if (!empty($codigo_recebido))
        <script>
            $(document).ready(function(e) {
                $("#deletar").modal("show");
            });
        </script>
    @endif

@endsection

@extends('template.painel_pessoa')
@section('title', 'Listagem de Pessoa')
@section('content')
<div class="row mb-3">
    <div class="col-lg-2">
        <!-- <a href="" class="btn btn-primary">Cadastrar</a> -->
    </div>
</div>



<div class="card">
    <div class="card-body">
        <h5 class="card-title">Pessoas</h5>

        <!-- Default Table -->
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Cidade</th>
                    <th scope="col" colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                
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
                @if(!empty($codigo_recebido))                
                <form method="POST" action="">
                @endif
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
@if(!empty($codigo_recebido))
<script>
    $(document).ready(function(e) {
        $("#deletar").modal("show");
    });
</script>
@endif

@endsection
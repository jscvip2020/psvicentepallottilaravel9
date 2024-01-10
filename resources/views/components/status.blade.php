@if ($value === 1)
    <a href="{{route($model.'.status',$id)}}" title="ativo">
        <span class="fas fa-check text-3xl text-green-700"></span>
    </a>
@else
    <a href="{{route($model.'.status',$id)}}" title="Inativo">
        <span class="fas fa-xmark text-3xl text-red-700"></span>
    </a>
@endif

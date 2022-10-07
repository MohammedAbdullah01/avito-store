@props(['class' => '' ,'colorButton' => 'main' , 'type' => 'submit' , 'value' => '' , 'modal' =>''])
<div class="{{$class}}">
    <button type="{{$type}}" class="btn btn-outline-{{$colorButton}} btn-sm" data-bs-dismiss="{{$modal}}">
        {{ __($value) }}
    </button>
</div>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-rose-700 hover:bg-rose-600 p-1 rounded-md hover:font-bold', 'onclick' => "return confirm('¿Seguro que desea eliminar el registro?')"]) }}>
    <i class="fa-solid fa-trash"></i> {{ $slot }}
</button>
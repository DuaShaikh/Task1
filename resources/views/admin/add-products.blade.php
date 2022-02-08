<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container" >
                            <form autocomplete="off" method="post" action="add-product" enctype="multipart/form-data">
                            @csrf
                            @include('admin.product-form')
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <script type="text/javascript">
    $(document).ready(function() {
    $('.categories').select2();
});

 </script>

</x-app-layout>

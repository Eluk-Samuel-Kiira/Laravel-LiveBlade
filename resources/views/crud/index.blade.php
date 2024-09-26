<x-app-layout>
    @section('title', 'Home - Crud')
    <div class="page-wrapper">
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">DataTable Import</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">New Item</button>
                    @include('crud.datatable')
                </div>
            </div>
            @include('crud.create-crude')
        </div>
    </div>
</x-app-layout>
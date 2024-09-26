<section>
    <div class="row row-cols-auto g-3">
        <div class="col">
            <!-- Modal -->
            <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create New Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="createCrudForm">
                            <div class="modal-body">
                                <div class="card-body p-4">
                                    <div class="row g-3 needs-validation" novalidate>
                                        <div class="col-md-6">
                                            <label for="bsValidation1" class="form-label">Full Name</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                            <div id="name"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="bsValidation2" class="form-label">Office</label>
                                            <input type="text" name="office" id="office" class="form-control">
                                            <div id="office"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="bsValidation1" class="form-label">Position</label>
                                            <input type="text" name="position" id="position" class="form-control">
                                            <div id="position"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="bsValidation2" class="form-label">Salary</label>
                                            <input type="text" name="salary" id="salary" class="form-control">
                                            <div id="salary"></div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="bsValidation2" class="form-label">age</label>
                                            <input type="text" name="age" id="age" class="form-control">
                                            <div id="age"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.liveblade-imports')
    <script>
        // Laravel routes and form handling to be pass to js
        window.routes = {
            'cruds.store': "{{ route('cruds.store') }}",
        };

        const handleFormSubmit = (formId, routeName, method) => {
            document.getElementById(formId).addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = Object.fromEntries(new FormData(this));
                formData._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                // You can as well perform validations here
                
                LiveBlade.load(routeName, method, formData, `#${formId}`);
            });
        };

        // Example usage for multiple forms, pass form id with route name
        handleFormSubmit('createCrudForm', 'cruds.store', 'POST');
    </script>
</section>
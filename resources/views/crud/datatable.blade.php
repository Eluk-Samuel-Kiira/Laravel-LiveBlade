<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="officeDataTable">
            @if (isset($offices))
                @foreach ( $offices as $office)
                    <tr>
                        <td>{{ $office->name }}</td>
                        <td>{{ $office->office }}</td>
                        <td>{{ $office->position }}</td>
                        <td>{{ $office->salary }}</td>
                        <td>{{ $office->age }}</td>
                        <td>{{ $office->created_at }}</td>
                        <td>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                    <i class='bx bx-dots-vertical-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editOfficerModal">Edit Item</button>                              
                                        @include('crud.edit-crud',['office' => $office])
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
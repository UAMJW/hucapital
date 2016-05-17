<!-- resources/views/candidates.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Candidate Form -->
        <form action="{{ url('candidate') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Candidate Name -->
            <div class="form-group">
                <label for="candidate" class="col-sm-3 control-label">Candidate</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="candidate-name" class="form-control">
                </div>
            </div>

            <!-- Add Candidate Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Candidate
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Candidates -->
    <!-- Current Candidates -->
    @if (count($candidates) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Candidates
            </div>

            <div class="panel-body">
                <table class="table table-striped candidate-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Candidate</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($candidates as $candidate)
                            <tr>
                                <!-- Candidate Name -->
                                <td class="table-text">
                                    <div>{{ $candidate->name }}</div>
                                </td>

                                <td>
								<!-- Delete Button -->
								<td>
									<form action="{{ url('task/'.$task->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" class="btn btn-danger">
											<i class="fa fa-trash"></i> Delete
										</button>
									</form>
								</td>
							</tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

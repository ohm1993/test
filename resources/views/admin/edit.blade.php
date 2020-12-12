@extends('layouts.app')
@section('content')
<div class="container">
    <!--Content-->
    <div class="mt-5 rounded-lg shadow">
        <!--Header-->
        <div class="text-center pt-2 pb-2 bg-yellow">
            <h2>{{ __('Update User') }}</h2>
        </div>
        <!--Body-->
        <div class="m-4 p-2">
            <form method="post" class="mt-4 pt-2" action="{{ route('admin.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <!--Body-->
                <div class="row">
                    <div class="form-group col-12 col-lg-12 col-md-12">
                        <input id="name" autocomplete="off" type="text" name="name" class="form-control validate @error('name') is-invalid @enderror" value={{ $user->name }} required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12 col-lg-12 col-md-12">
                        <input id="email" autocomplete="off" type="email" name="email" class="form-control validate @error('email') is-invalid @enderror" value={{ $user->email }}>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12 col-lg-12 col-md-12">
                        <select required id="status" name="status" class="form-control">
                            <option @if ($user->status == 0) selected @endif value="0">Disabled</option>
                            <option @if ($user->status == 1) selected @endif value="1">Enabled</option>
                        </select>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Update User') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/.Content-->

</div>
@endsection
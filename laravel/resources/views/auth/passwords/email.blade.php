@extends('layouts.master')

        <!-- Main Content -->
@section('page-title')
    Reset Password
@endsection
@section('main')

    <div class="main">
        <section>


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-btn glyphicon-envelope"></i> Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

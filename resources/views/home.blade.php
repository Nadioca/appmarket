@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    ¡Bienvenido al Laravel de Aco!
                </div>
            </div>

            <form>
              <div class="form-group">
              <input type="button" id="dashboards" class="btn btn-primary" value="ir a Dashboard" onclick="window.open('dashboards','_self',false)">
                </div>
            </form>

            </div>
        </div>
    </div>
</div>
@endsection

@include('admins.components.breakcumb')
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$title}}</h5>
                @include('admins.sanphams.components.toolbox')
            </div>
            <div class="ibox-content">
                @include('admins.sanphams.components.formupdate')
            </div>
        </div>
    </div>
</div>
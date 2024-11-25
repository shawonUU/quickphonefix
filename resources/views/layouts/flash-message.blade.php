@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" style="margin: 10px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@elseif ($message = Session::get('warning'))
<div class="alert alert-warning alert-block" style="margin: 10px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@elseif ($message = Session::get('info'))
<div class="alert alert-info alert-block" style="margin: 10px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@elseif ($message = Session::get('static'))
<div class="alert alert-success alert-important" style="margin: 10px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@elseif ($errors->any())
<div class="alert alert-danger alert-block" style="margin: 10px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :
    @foreach ($errors->all() as $error)
    <br><strong>{{ $error }}</strong>
    @endforeach
</div>
@elseif ($message = Session::get('error'))
<div class="alert alert-danger alert-block" style="margin: 10px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

{{-- FOR JAVASCRIPT --}}


<div id="alert-success" class="alert alert-success alert-block d-none" style="margin: 10px;">
    <button type="button" class="close" onclick="document.getElementById('alert-success').classList.add('d-none')">×</button>
    <strong id="alert-success-message"></strong>
</div>
<div id="alert-warning" class="alert alert-warning alert-block d-none" style="margin: 10px;">
    <button type="button" class="close" onclick="document.getElementById('alert-warning').classList.add('d-none')">×</button>
    <strong id="alert-warning-message"></strong>
</div>
<div id="alert-info" class="alert alert-info alert-block d-none" style="margin: 10px;">
    <button type="button" class="close" onclick="document.getElementById('alert-info').classList.add('d-none')">×</button>
    <strong id="alert-info-message"></strong>
</div>

<div id="alert-danger" class="alert alert-danger alert-block d-none" style="margin: 10px;">
    <button type="button" class="close" onclick="document.getElementById('alert-danger').classList.add('d-none')">×</button>
    <strong id="alert-danger-message"></strong>
</div>
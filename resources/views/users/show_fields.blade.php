<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Mobile Field -->
<div class="form-group">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{{ $user->mobile }}</p>
</div>

<!-- Date of Joining Field -->
<div class="form-group">
    {!! Form::label('joining_date', 'Joining Date:') !!}
    <p>{{ $user->joining_date }}</p>
</div>

<!-- Date of Last Login Field -->
<div class="form-group">
    {!! Form::label('last_login', 'Last Login:') !!}
    <p>{{ $user->last_login }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $user->updated_at }}</p>
</div>


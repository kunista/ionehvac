<select name='role' id='role'>
    @foreach($rolesForDropdown as $id => $name)
        <option value='{{ $id }}' {{ (isset($user) and $id == $user->role->id) ? 'SELECTED' : '' }}>{{ $name }}</option>
    @endforeach
</select>

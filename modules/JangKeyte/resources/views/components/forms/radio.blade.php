@isset($name)
    {{ html()->div()->attributes(['role' => 'group', 'aria-label' => $label])->children([
            html()->radio($id[0])->name($name)->checked(old($name, $value === '1'))->class('btn-check')->value(1),
            html()->label($choices[0])->for($id[0])->class('btn btn-outline-success col-6 mt-md-2'),
            html()->radio($id[1])->name($name)->checked(old($name, $value === '0'))->class('btn-check')->value(0),
            html()->label($choices[1])->for($id[1])->class('btn btn-outline-danger col-6 mt-md-2')
        ])->render() }}
    @if($errors->has($name))
        {{ html()->div($errors->first($name))->class('text-danger') }}
    @endif
@endisset

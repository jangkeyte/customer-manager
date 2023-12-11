@isset($name)
{{ Html::image(isset($default) ? (file_exists(public_path('/storage/uploads/' . (isset($type) ? $type . 's' : 'trees') . '/' . $default)) ? '/storage/uploads/' . (isset($type) ? $type . 's' : 'trees') . '/' . $default : '/assets/images/default.svg') : '/assets/images/default.svg', $label ?? '', array('class' => 'w-100 pt-2', 'name' => $name, 'id' => $name)) }}
@endisset
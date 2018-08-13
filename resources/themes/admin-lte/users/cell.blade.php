@component('components.cell', [
    'image_url'     => $user->avatar,
    'link'          => '#',
    'link_content'  => $user->name,
    'subhead'       => $user->email
])@endcomponent
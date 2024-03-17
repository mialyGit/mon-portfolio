@props([
    'title' => '',
])

<div class="app-title">
  <div>
    <h1><i class="fa fa-th-list"></i> @lang($title)</h1>
    <p></p>
  </div>
  <x-shared.breadcrumb>
    @lang($title)
  </x-shared.breadcrumb>
</div>
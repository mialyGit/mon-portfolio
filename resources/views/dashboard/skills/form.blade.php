<div class="form-row">
    <div class="form-group col-md-12">
        <x-forms.input label="Techno" model="name" autofocus required value="{{ $skill->name }}"></x-forms.input>
    </div>

    <div class="form-group col-md-12">
        <x-forms.input label="Icon URL" model="icon" value="{{ $skill->icon }}"></x-forms.input>
    </div>

    <div class="form-group col-md-12">
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="is_visible"
                    @checked(old('is_visible', $skill->is_visible))>@lang('Skill is visible')
            </label>
        </div>
    </div>

    <div class="mt-4">
        <x-buttons.save></x-buttons.save>
        <x-buttons.cancel class="ml-2" href="{{ route('dashboard.skills.index') }}"></x-buttons.cancel>
    </div>
</div>

<div class="text-center form-check form-check-inline" style="max-width: 18rem;">
    <label style="width: 16rem" class="form-check-label px-1 px-md-4 pt-1 pt-md-3 pb-0" for="{{ $idLabel }}">
        <input class="form-check-input" type="radio" name="{{ $optionName }}" id="{{ $idLabel }}" value="{{ $optionValue }}" data-question="{{ $dataQuestion }}" data-cost="{{ $dataCost }}" required>
        <img class="img-fluid" src="{{ $imgPath }}" width="150">
        <p class="mt-3">{{ $title }}</p>
    </label>
</div>
<div class="text-center form-check form-check-inline">
    <label class="form-check-label px-4 pt-3 pb-0" for="{{ $idLabel }}">
        <input class="form-check-input" type="radio" name="{{ $optionName }}" id="{{ $idLabel }}" value="{{ $optionValue }}" data-question="{{ $dataQuestion }}" data-cost="{{ $dataCost }}" required>
        <img class="img-fluid" src="{{ $imgPath }}">
        <p class="mt-3">{{ $title }}</p>
    </label>
</div>
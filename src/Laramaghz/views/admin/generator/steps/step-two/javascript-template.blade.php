<div class="column"><div class="row"><div class="col-lg-3">@include("laramaghz::fileds.javascript.text" , ["name" => "name[]" , "label" => trans("laramaghz::laramaghz.Column")." ".trans("laramaghz::laramaghz.Name")])</div><div class="col-lg-3">@include("laramaghz::fileds.javascript.select", ["name" => "column[]" , "array" => $migrationTypes , "label" => trans("laramaghz::laramaghz.Column")])</div><div class="col-lg-3">@include("laramaghz::fileds.javascript.select" , ["name" => "modifiers[]", 'array' => $migrationModifiers + ['' => 'None'] , "label" => trans("laramaghz::laramaghz.Column")." ".trans("laramaghz::laramaghz.modifiers")])</div></div><div class="row"><div class="col-lg-3">@include("laramaghz::fileds.javascript.select" , ["name" => "multi_lang[]", 'array' => yesNoArray() , "label" => trans("laramaghz::laramaghz.Language")])</div><div class="col-lg-2"><span class="btn btn-danger" onclick="removeThisColumn(this)" style="margin-top: 25px"><i class="fa fa-trash"></i></span></div></div></div>
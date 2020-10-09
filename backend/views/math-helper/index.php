<?php
/* @var $this yii\web\View */
use yii\web\View;

$this->registerJsFile(
    '@web/js/math.js',
    [
        'position' => View::POS_END,
        'depends' => [\yii\web\JqueryAsset::className()],
    ]
);
$this->registerJsFile(
    'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js',
    [
        'id' => 'MathJax-script',
        'async' => 'async',
        'position' => View::POS_END,
        'depends' => [\yii\web\JqueryAsset::className()],
    ]
);
?>
<p>Berikut adalah sintaks - sintaks masukan untuk menggunakan formula matematika. Selengkapnya bisa dilihat di dokumentasi <a href="http://asciimath.org/" target="_blank">Ascii Math</a> berikut ini. Sintaks yang dimasukkan harus diapit dengan tanda &#x0300; . . . &#x0300;</p>
<table class="table table-bordered">
	<tr>
		<th>
			Teks
		</th>
		<th>
			Sintaks
		</th>
	</tr>
	<tr><td>`a^2`</td><td>a^2</td></tr>
	<tr><td>`1/2`</td><td>1/2</td></tr>
	<tr><td>`sqrt{a}`</td><td>sqrt{a}</td></tr>
	<tr><td>`root(3)(x)`</td><td>root(3)(x)</td></tr>
	<tr><td>`root(3)(x^2)`</td><td>root(3)(x^2)</td></tr>
	<tr><td>`(a + b) ^ 2`</td><td>(a + b) ^ 2</td></tr>
	<tr><td>`a^2+2ab+b^2`</td><td>a^2+2ab+b^2</td></tr>
	<tr><td>`36 cm^2`</td><td>36 cm^2</td></tr>
	<tr><td>`((a),(b))`</td><td>((a),(b))</td></tr>
	<tr><td>`sum_(i=1)^n i^3=((n(n+1))/2)^2`</td><td>sum_(i=1)^n i^3=((n(n+1))/2)^2</td></tr>
</table>
<p>*Formula - formula di atas dihasilkan dengan menggunakan library <a href="https://www.mathjax.org/" target="_blank">Mathjax</a>.</p>

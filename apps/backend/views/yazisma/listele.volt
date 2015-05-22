{% set sonKullanici = '' %}
{% set tag = 'in' %}

{% for yazisma in yazismalar %}
{% if sonKullanici == yazisma.kullanici_id or sonKullanici == '' %}
	<li class="{{tag}}">
{% else %}
	{% if tag == 'in' %}
		{% set tag = 'out' %}
	{% else %}
		{% set tag = 'in' %}
	{% endif %}
	<li class="{{tag}}">
{% endif %}
    <img class="avatar" alt="" src="{{url('frontend/assets/img/logo.png')}}"/>
    <div class="message">
        <span class="arrow">
        </span>
        <a href="#" class="name">
        {{yazisma.ad}}</a>
        <span class="datetime">
        - {{yazisma.tarih}} </span>
        <span class="body">
        {{yazisma.mesaj}}</span>
    </div>
</li>
{% set sonKullanici = yazisma.kullanici_id %}

{% endfor %}
                        
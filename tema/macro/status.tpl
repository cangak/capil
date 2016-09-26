{% macro status(id) %}
{% if id==1 %} Aktif {% elseif id==0 %} Tidak Aktif  {% else %}  No Data   {% endif %}
{% endmacro %}

{% macro value(data,dalam) %}
 {% for d in data %}
        {{ dump(d) }}
    {% endfor %}
{% endmacro %}


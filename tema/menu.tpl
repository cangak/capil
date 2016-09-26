<!--macros/menu-macros.html-->
{% macro menu_sub(links) %}
{% import _self as macros %}
    {% for link in links %}

<li>
            <a href="{{ link.link }}"><i class="{{link.icon}}"></i><span class="title">{{ link.title }}</span></a>
            {% if link.sub %}
                <ul>
                    {{ _self.menu_sub(link.sub) }}
                </ul>
            {% endif %}
        </li>
            {% endfor %}

{% endmacro %}

{% macro menu_links(links) %}
    {% import _self as macros %}
    {% for link in links %}
    <li>
            <a  href="{{ link.link }}"><i class="{{link.icon}}"></i><span class="title">{{ link.title }}</span></a>
            {% if link.sub %}
                <ul>
                    {{ _self.menu_sub(link.sub) }}
                </ul>
            {% endif %}
        </li>
    {% endfor %}
{% endmacro %}  
{% import _self as macros %}


<ul id="main-menu" class="main-menu">
    {{ macros.menu_links(links) }}
</ul>
{% macro menu_links(links) %}
    {% for link in links %}
        <li>
            <a href="{{ link.link }}">{{ link.title }}</a>
            {% if link.children %}
                <ul>
                    {{ _self.menu_links(link.children) }}
                </ul>
            {% endif %}
        </li>
    {% endfor %}
{% endmacro %}
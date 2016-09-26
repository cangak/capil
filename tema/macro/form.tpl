{% macro panel(nama) %}
<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">{{nama|title}}</div>

				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
				</div>
            </div>
		<div class="panel-body">
{%endmacro%}
 {% macro buka_form(id,action,class) %}
 <form role="form" action="{{action}}" id="{{id}}" method="post" class="{{ value|default('validate') }}" novalidate="novalidate">
{%endmacro%}
{% macro hidden(name,value)%}
<input type="hidden" name="{{name}}" value="{{value}}">
	{% endmacro %}
 {% macro input(label,name, value, type,placeholder, pesen,validate,id,sm,lm,readonly) %}
  <div class="form-group">
  	<label class="col-sm-{{lm|default('3')}} control-label">{{label|title}}</label>
<div class="col-sm-{{sm|default('5')}}">
    <input id="{{ id|e }}" type="{{ type }}" class="form-control" name="{{ name }}" value="{{ value|e }}" data-validate="{{ validate }}" data-message-required="{{ pesen}}" placeholder="{{placeholder}}" {% if readonly|default(false) %} readonly="readonly" style="background-color: white" {% endif %}/>
</div>
</div>
    {% endmacro %}

{% macro submit(id) %}
	<div class="form-group">
						<button id="{{id}}" type="submit" class="btn btn-success">Simpan</button>
						<button type="reset" class="btn">Batal</button>
					</div>
				</form>
			</div>
		</div>
{% endmacro %}
{% macro tombol(link,class,nama) %}
<a href="{{ link }}"><button type="submit" class="{{ class }}">{{ nama }}</button></a>
{% endmacro %}
{% macro drop(label,name,class,value,placeholder,selected,sm) %}
<div class="form-group">
  	<label class="control-label col-sm-3">{{label|title}}</label>
<div class="col-sm-{{sm|default('5')}}">
<select name="{{ name }}" class="{{ class }}" data-allow-clear="true" data-placeholder="{{ placeholder }}">
										<option></option>
										{% for a in value %}
                                        <option value="{{ a.id }}" {% if selected==a.id %} selected {% endif %}> {{ a.nama }}</option>
                                        {% endfor %}
									</select>
                                    </div>
                                    </div>
{% endmacro %}
{% macro yesno(label,name,class,selected) %}
<div class="form-group">
<label class="control-label col-sm-3">{{label|title}}</label>
<div class="col-sm-{{sm|default('5')}}">
<select name="{{ name }}" class="{{ class }}">

	  <option value="1" {% if selected==1 %} selected {% endif %}> Ya</option>
	  <option value="0" {% if selected==0 %} selected {% endif %}> Tidak</option>

</select>
</div>
</div>
{% endmacro %}
{% macro dropalone(label,name,class,value,placeholder,selected) %}
<select name="{{ name }}" class="{{ class }}" data-allow-clear="true" data-placeholder="{{ placeholder }}">
                                                                                <option></option>
                                                                                {% for a in value %}
                                        <option value="{{ a.id }}" {% if selected==a.id %} selected {% endif %}> {{ a.nama }}</option>
                                        {% endfor %}
                                                                        </select>
{% endmacro %}

{% macro textarea(label,name, value,placeholder, pesen,validate,id,sm) %}
  <div class="form-group">
  	<label class="col-sm-3 control-label">{{label|title}}</label>
<div class="col-sm-{{sm|default('5')}}">
	<textarea class="{{class|default('form-control')}}" id="{{id}}" name="{{name}}" data-validate="{{ validate }}" data-message-required="{{ pesen}}" placeholder="{{placeholder}}" style="min-width: 100%;min-height: 100px;resize: none">{{ value|e }}</textarea>
</div>
</div>
    {% endmacro %}
{% macro date(label,name,id,sm) %}
<div class="form-group">
 	<label class="col-sm-3 control-label">{{label}}</label>
	<div class="col-sm-{{sm|default('5')}}">
		<div class="datepicker no-border"></div>
		<!-- add class "no-border" to remove the outline it -->
	</div>
</div>
    {% endmacro %}

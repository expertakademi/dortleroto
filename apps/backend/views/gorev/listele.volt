 {% for gorev in gorevler %}
 <li id="task{{gorev.id}}" {% if gorev.durum == 1 %} class="task-done" {% endif %}>
     <div class="task-title">
         <span class="task-title-sp">{{gorev.aciklama}} </span>
         <span class="label label-sm label-success">{{gorev.tip|capitalize}}</span>
     </div>
     <div class="task-config">
         <div class="task-config-btn btn-group">
             <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
             <i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
             </a>
             <ul class="dropdown-menu pull-right">
                 {% if gorev.durum != 1 %}
                 <li>
                     <a class="load-modal" data-target="#generalModal" data-href="{{url('admin/gorev/tamamla/id:'~gorev.id)}}" data-form="true">
                     <i class="fa fa-check"></i> Tamamla </a>
                 </li>
                 <li>
                     <a class="load-modal" data-target="#generalModal" data-href="{{url('admin/gorev/duzenle/id:'~gorev.id)}}" data-form="true">
                     <i class="fa fa-pencil"></i> Düzenle </a>
                 </li>
                 {% endif %}
                 <li>
                     <a class="load-modal" data-target="#generalModal" data-href="{{url('admin/gorev/sil/id:'~gorev.id)}}" data-form="true">
                     <i class="fa fa-trash-o"></i> Sil </a>
                 </li>
             </ul>
         </div>
     </div>
 </li>
 {% endfor %}
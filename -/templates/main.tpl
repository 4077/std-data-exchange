<div class="{__NODE_ID__}" instance="{__INSTANCE__}">

    <div class="target_name">
        {TARGET_NAME}
    </div>

    <div class="cb"></div>

    {IMPORT_BUTTON}
    {EXPORT_BUTTON}

    <div class="cb"></div>

    <!-- export -->
    <textarea class="export">{JSON}</textarea>

    <div class="copy_button" hover="hover">Копировать</div>
    <!-- / -->

    <!-- import -->
    <textarea class="import">{JSON}</textarea>

    <div class="perform_import_button" hover="hover" hover_listen="2_level">Импортировать</div>
    <div class="perform_import_2_level_button" hover="hover" hover_broadcast="2_level">только вложенные узлы</div>
    <!-- / -->

</div>

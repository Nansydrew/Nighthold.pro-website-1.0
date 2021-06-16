<div class="font-semp-medium-white">{{ $data->name }}</div>
<div class="font-blizz-light-xSmall-white fontStyle-italic color-expansion-LEGION">В игре с выхода Legion</div>
<div class="space-normal"></div>
<div class="font-bliz-light-xSmall-beige"> {{ $data->description }}</div>
<div class="space-normal"></div>
<div class="Divider Divider--thin Divider--opaque"></div>
<div class="space-normal"></div>
<div>
    <div class="inline font-bliz-light-xSmall-darkBeige fontWeight-bold">Игроки: </div>
    <div class="inline font-bliz-light-xSmall-beige"> {{ $data->players }}</div>
</div>
<div>
    <div class="inline font-bliz-light-xSmall-darkBeige fontWeight-bold">Уровень: </div>
    <div class="inline font-bliz-light-xSmall-beige"> {{ $data->level }}</div>
</div>
<div>
    <div class="inline font-bliz-light-xSmall-darkBeige fontWeight-bold">Местонахождение: </div>
    <div class="inline font-bliz-light-xSmall-beige"> {{ $data->location }}</div>
</div>
<div class="inline font-bliz-light-xSmall-darkBeige fontWeight-bold">Режимы: </div>
<div class="inline font-bliz-light-xSmall-beige">
    @if($data->lfr)СПР@endif
    @if($data->lfr),@endif
    @if($data->normal)Обычный@endif
    @if($data->heroic),@endif
    @if($data->heroic)Героический@endif
    @if($data->mythic),@endif
    @if($data->mythic)Эпохальный@endif
</div>

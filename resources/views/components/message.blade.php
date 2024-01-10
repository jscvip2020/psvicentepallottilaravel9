<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 15:40
 */
?>
@if (session('success'))
    <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1 mr-3">
                <i class="fas fa-check-double"></i>
            </div>
            <div>
                <p class="font-bold">Muito bem!!!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
<div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
    <div class="flex">
        <div class="py-1 mr-3">
            <i class="fas fa-triangle-exclamation"></i>
        </div>
        <div>
            <p class="font-bold">OOPPss!!!</p>
            <p class="text-sm">{{ session('error') }}</p>
        </div>
    </div>
</div>

@endif

$(document).ready(function(){

    if ($('#main_stats').length) {
        $('.stat-click').on('click', function(){
            $('.stat-click i').removeClass('active');
            $(this).find('i').addClass('active');
            let type = '.data-'+$(this).attr('data-class');
            let scflArray = [];
            switch ($(this).attr('data-class')) {
                case 'pilot':
                    $('.tr-sort').css('order', 0);
                    break;
                case 'score':
                case 'kills':
                case 'deaths':
                case 'assists':
                case 'ai':
                case 'cap':
                case 'won':
                case 'lost':
                    $(type).each(function (){
                        let name = $(this).attr('data-id');
                        let value = parseInt($(this).attr('data-value'));
                        if (value == null) value = 0;
                        scflArray.push([name, value]);
                    });

                    break;
                case 'kd':
                case 'kda':
                case 'wl':
                    $(type).each(function (){
                        let name = $(this).attr('data-id');
                        let value = parseFloat($(this).attr('data-value'));
                        scflArray.push([name, value]);
                    });
                    break;
            }
            scflArray.sort(compareSecondColumnD);

            if (scflArray.length !== 0) {
                for (let i = 0; i < scflArray.length; i++) {
                    $('.tr-sort').each(function (){
                        if ($(this).attr('data-id') == scflArray[i][0]) $(this).css('order',i);
                    });
                }
            }

        });
    }

    if ($('.standings-table').length) {
        $('.standings-click').on('click', function(){
            $(this).siblings().find('i').removeClass('active');
            $(this).find('i').addClass('active');
            let type = '.data-'+$(this).attr('data-class');
            let scflArray = [];
            switch ($(this).attr('data-class')) {
                case 'team':
                    $(this).parents('table').find('.tr-stand-sort').css('order', 0);
                    break;
                case 'games':
                case 'score':
                case 'kills':
                case 'deaths':
                case 'assists':
                case 'ai':
                case 'cap':
                    $(type).each(function (){
                        let name = $(this).attr('data-id');
                        let value = parseInt($(this).attr('data-value'));
                        if (value == null) value = 0;
                        scflArray.push([name, value]);
                    });
                    scflArray.sort(compareSecondColumnD);

                    break;
                case 'points':
                    $(type).each(function (){
                        let name = $(this).attr('data-id');
                        let value = parseInt($(this).attr('data-value'));
                        let secondValue = parseFloat($(this).attr('data-value-two'));
                        if (value == null) value = 0;
                        scflArray.push([name, value, secondValue]);
                    });
                    scflArray.sort(compareSecondColumnD2);
                    break;
                case 'kd':
                case 'kda':
                    $(type).each(function (){
                        let name = $(this).attr('data-id');
                        let value = parseFloat($(this).attr('data-value'));
                        scflArray.push([name, value]);
                    });
                    scflArray.sort(compareSecondColumnD);

                    break;
            }

            if (scflArray.length !== 0) {
                for (let i = 0; i < scflArray.length; i++) {
                    $(this).parents('table').find('.tr-stand-sort').each(function (){
                        if ($(this).attr('data-id') == scflArray[i][0]) $(this).css('order',i);
                    });
                }
            }

        });

        $('.standings-table').each(function(){
            let scflArrayStart = [];
            let typeStart = '.data-points';
            $(this).find(typeStart).each(function (){
                let name = $(this).attr('data-id');
                let value = parseInt($(this).attr('data-value'));
                let secondValue = parseFloat($(this).attr('data-value-two'));
                if (value == null) value = 0;
                scflArrayStart.push([name, value, secondValue]);
            });
            scflArrayStart.sort(compareSecondColumnD2);
            if (scflArrayStart.length !== 0) {
                for (let i = 0; i < scflArrayStart.length; i++) {
                    $(this).find('.tr-stand-sort').each(function (){
                        if ($(this).attr('data-id') == scflArrayStart[i][0]) $(this).css('order',i);
                    });
                }
            }

        });
    }

    if ($('#pilots').length) {
        let anchor = getAnchor();
        if (anchor != null) {
            let id = '#'+anchor;
            if ($(id).length) $(id).addClass('blink-me');

            // Get the current scroll position
            let currentPosition = document.documentElement.scrollTop;
            let headerHeight = document.getElementsByClassName('stat-click')[1].offsetHeight;

            document.documentElement.scrollTop = currentPosition - headerHeight - 10;
        }
    }

    if ($('.division-filter').length) {
        $('.division-filter li').on('click', function (){
            let div = $(this).data('division');
            if (div === 0) {
                $('.tr-sort').css('display', 'flex');
            } else {
                $('.tr-sort').css('display', 'none');
                $('.'+div).css('display', 'flex');
            }
            $('.division-filter li').removeClass('selected');
            $(this).addClass('selected');
            console.log(div);
        });
    }

    if ($('.admin-toggle').length) {
        $('.admin-toggle').on('click', function() {
           $(this).siblings().slideToggle();
           $(this).find('i').toggleClass('fa-rotate-180');
           // $(this).find('i').toggleClass('fa-chevron-up');
        });
    }

    if ($('.datepicker-ui').length) {
        $('.datepicker-ui').datepicker({
            dateFormat: 'd MM yy'
        });
    }

    if ($('#admin-report').length) {
        $('#new-report-matchup_id').on('change', function(){
            let one = $(this).find('option:selected').attr('data-team1');
            let two = $(this).find('option:selected').attr('data-team2');
            $('.pilot-list').find('option').each(function(){
                let id = $(this).attr('data-team');

                if (id == one || id == two) {
                    $(this).css('display', 'initial');

                } else {
                    $(this).css('display', 'none');
                }
            });
        });
        $('#1-new-report-faction').on('change', function(){
           if ($(this).val() == 0) {
               console.log('New Republic selected');
               $('#2-new-report-faction').val('1')
           } else {
               console.log('Empire selected');
               $('#2-new-report-faction').val('0')
           }
        });
    }

});

function compareSecondColumnA(a, b) {
    if (a[1] === b[1]) {
        return 0;
    } else {
        return (a[1] < b[1]) ? -1 : 1;
    }
}
function compareSecondColumnD(a, b) {
    if (a[1] === b[1]) {
        return 0;
    } else {
        return (a[1] > b[1]) ? -1 : 1;
    }
}
function compareSecondColumnD2(a, b) {
    if (a[1] === b[1]) {
        if (a[2] === b[2]) {
            return 0;
        } else {
            return (a[2] > b[2]) ? -1 : 1;
        }
    } else {
        return (a[1] > b[1]) ? -1 : 1;
    }
}

function getAnchor() {
    return (document.URL.split('#').length > 1) ? document.URL.split('#')[1] : null;
}

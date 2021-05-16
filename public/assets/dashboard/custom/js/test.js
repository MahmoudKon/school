$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); // TO SEND THE CSRF TOKEN WITH AJAX REQUEST



    const date = new Date();

    $('body').on('submit', '#presence', function (e) {
        e.preventDefault();

        let days = new Array();
        days[0] = 'Saturday';
        days[1] = 'Sunday';
        days[2] = 'Monday';
        days[3] = 'Tuesday';
        days[4] = 'Wednesday';
        days[5] = 'Thursday';

        let months = new Array();
        months[0] = 'January';
        months[1] = 'February';
        months[2] = 'March';
        months[3] = 'April';
        months[4] = 'May';
        months[5] = 'June';
        months[6] = 'Jule';
        months[7] = 'August';
        months[8] = 'September';
        months[9] = 'October';
        months[10] = 'November';
        months[11] = 'December';


        var day = days[date.getDay()],
            month = months[date.getMonth()],
            time = date.toLocaleString(),
            currentTime = time.slice(12, 20);

        var gmonth = $('input[name=month]').val(month),
            gday = $('input[name=day]').val(day),
            gtime = $('input[name=Tpresence]').val(currentTime);

        //console.log(currentTime);

    }); //End of submit Presence

    // //START GET DAY OF ABSENCES DEPANDENT OF ID
    // $('body').on('change', 'select[name=user_id]', function (e) {
    //     e.preventDefault();
    //     var absence = $('.user_id:selected').text(),
    //         url = $(this).data('url');

    //     //alert(url+'?name='+absence);

    //     $.ajax({
    //         method: 'GET',
    //         url: url + '? name = ' + absence,
    //         data: '',
    //         success: function (data) {
    //             $('.absence').html(data.view);
    //         }
    //     });


    // }); //END OF GET DAY OF ABSENCES DEPANDENT OF ID



    /*

    salary  => 900
    day     => 900 / 30 =  30EGP

    _________absence => 3 * 30   = 90_____________

    rate    => 900 - 90 = 810


    */
    //START SUBMIT TO COUNT SALARY
    $('body').on('submit', '.form', function (e) {
        e.preventDefault();
        var salary = $('input[name=salary]').val(), // get salary
            countDay = salary / 30, // get days of month
            getDayOfAbsences = $('input[name=absence]').val(), // get days of absences for user
            countDayOfAbsences = countDay * getDayOfAbsences;

        var deduction = $('input[name=deduction]').val(countDayOfAbsences), // push value of absences days to count salary
            rate = salary - countDayOfAbsences, // count of salary for last of month
            incentives = salary + $('input[name=incentives]').val(); // count of incentives
        $('input[name=rate]').val(rate); // push value of absences days to count salary


    }); //END OF SUBMIT TO COUNT SALARY

}); //END OF DOCUMENT

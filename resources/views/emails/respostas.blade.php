<html>
<body>
    <h1> User Name: {{ $userName }}</h1>
    <h3>
        Multiple options answers
    </h3> 

    <ul>
        @php
            $totalRightAnswers = 0;
        @endphp
       
        @foreach ($multipleOption as $answer)
            <li>
                Question Number: {{ $answer['mo_answer_id'] }}<br>
                Answer: {{ $answer['mo_answer'] }}
            </li>
            @if ($answer['mo_answer'] === 'correct')
                @php
                    $totalRightAnswers++;
                @endphp
            @endif
        @endforeach
    </ul>

    <h3>Multiple options right answers: {{ $totalRightAnswers }}</h3>

    <h3>Read interpretation answers</h3>
    <ul>
        @php
            $totalReadRightAnswers = 0;
        @endphp

        @foreach ($reading as $read)
           
            <li>
                
                Question Number: {{ $read['r_answer_id'] }}<br>
                Answer: {{ $read['r_answer'] }}
            </li>
            @if ($read['mo_answer'] === 'correct')
                @php
                    $totalReadRightAnswers++;
                @endphp
            @endif
        @endforeach
    </ul>

    <h3>Read interpretation right answers: {{ $totalReadRightAnswers }}</h3>


    <p>Text: {{ json_encode($write) }}</p>
   
</body>
</html>
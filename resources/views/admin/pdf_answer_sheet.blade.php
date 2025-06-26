<!DOCTYPE html>
<html>
<head>
    <title>Answer Sheet - {{ $user->name }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            line-height: 1.6;
            margin: 30px;
            color: #333;
        }

        h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        p {
            margin: 5px 0;
        }

        hr {
            border: 1px solid #999;
            margin: 20px 0;
        }

        .question {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-left: 4px solid #007bff;
            background-color: #f9f9f9;
        }

        .question strong {
            display: inline-block;
            width: 130px;
            font-weight: 600;
        }

        .correct {
            color: green;
            font-weight: bold;
        }

        .incorrect {
            color: red;
            font-weight: bold;
        }

        .header-info {
            margin-bottom: 20px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 5px 10px;
            vertical-align: top;
        }

        .info-table td.label {
            font-weight: bold;
            width: 100px;
        }

    </style>
</head>
<body>
    <h2>Answer Sheet</h2>

    <table class="info-table header-info">
        <tr>
            <td class="label">Student:</td>
            <td>{{ $user->name }}</td>
            <td class="label">Roll No:</td>
            <td>{{ $user->roll_no ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="label">Exam:</td>
            <td>{{ $exam->title }}</td>
            <td class="label">Score:</td>
            <td>{{ $attempt->score ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="label">Rank:</td>
            <td>{{ $attempt->rank ?? 'N/A' }}</td>
        </tr>
    </table>

    <hr>

    @foreach ($exam->questions as $q)
        @php
            $answer = $answers[$q->id]->answer ?? 'Not Answered';
            $isCorrect = $answer === $q->correct_answer;
        @endphp
        <div class="question">
            <p><strong>Q{{ $loop->iteration }}:</strong> {{ $q->question }}</p>
            <p><strong>Your Answer:</strong> <span class="{{ $isCorrect ? 'correct' : 'incorrect' }}">{{ $answer }}</span></p>
            <p><strong>Correct Answer:</strong> {{ $q->correct_answer }}</p>
            <p><strong>Marks:</strong> {{ $q->marks }}</p>
        </div>
    @endforeach
</body>
</html>

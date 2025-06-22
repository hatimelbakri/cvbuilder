<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download CV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 793px; /* A4 width */
            margin: 0 auto;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 793px;
            min-height: 1000px;
            background: #fff;
            margin: 30px auto;
            display: grid;
            grid-template-columns: 33% 67%;
            box-shadow: 0 20px 40px rgba(211, 68, 68, 0.1);
        }

        /* Left Side */
        .container .left_Side {
            background: #fff;
            padding: 30px;
        }

        .profileText {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(179, 46, 46, 0.2);
        }

        .profileText .imgBx {
            width: 150px;
            height: 190px;
            border-radius: 20%;
            overflow: hidden;
            position: relative;
        }

        .profileText .imgBx img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profileText h2 {
            color: black;
            font-size: 1.4em;
            margin-top: 18px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 600;
            line-height: 1.3em;
        }

        .profileText h2 span {
            font-size: 0.8em;
            font-weight: 300;
        }

        .contactInfo {
            padding-top: 30px;
        }

        .title {
            color: black;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 18px;
        }

        .contactInfo ul li {
            list-style: none;
            margin: 8px 0;
            cursor: pointer;
        }

        .contactInfo ul li .icon {
            display: inline-block;
            width: 26px;
            font-size: 16px;
            color: #e37b7d;
        }

        .contactInfo ul li span {
            color: black;
            font-weight: 300;
        }

        .contactInfo.project li {
            margin-bottom: 10px;
        }

        .contactInfo.project h5,
        .contactInfo.project h4 {
            color: black;
            font-weight: 500;
        }

        /* Right Side */
        .container .right_Side {
            background: #fff;
            padding: 30px;
        }

        .about {
            margin-bottom: 40px;
        }

        .about:last-child {
            margin-bottom: 0;
        }

        .title2 {
            color: #003147;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .about .title2 {
            margin-bottom: 16px;
        }

        .about .box,
        .about .box-project {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .about .box .year_company,
        .about .box-project .year_company {
            min-width: 120px;
        }

        .about .box .year_company h5,
        .about .box-project .year_company h5 {
            text-transform: uppercase;
            color: #848c90;
            font-weight: 600;
        }

        .about .box .text h4,
        .about .box-project .text h4 {
            text-transform: uppercase;
            color: rgb(148, 8, 8);
            font-size: 15px;
        }

        .skills .title-skill {
            margin-bottom: 16px;
        }

        .skills .box-skill {
            display: grid;
            grid-template-columns: 120px 1fr;
            align-items: center;
            margin-bottom: 10px;
        }

        .skills .box-skill h4 {
            text-transform: uppercase;
            color: #848c99;
            font-weight: 500;
        }

        .skills .box-skill .percent {
            height: 9px;
            background: #c1baba;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        .skills .box-skill .percent div {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: rgb(148, 8, 8);
        }

        .about .titleproject {
            margin-bottom: 16px;
        }

        h6 {
            color: black;
            font-weight: 500;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="left_Side">
            <div class="profileText">
                <div class="imgBx">
                    @if($info && $info->image)
                        <div class="imgBx">
                            <img src="{{ public_path('storage/upload/' . $info->image) }}" alt="Profile Image">
                        </div>
                    @else
                        <div class="imgBx">
                            <img src="{{ public_path('backend/img/default-avatar.png') }}" alt="Default Avatar">
                        </div>
                    @endif

                </div>
                <h2>{{ $info->name ?? 'Your Name' }}<br><span>{{ $cv->name ?? 'Your specialite' }}</span></h2>
            </div>
            <div class="contactInfo">
                <h3 class="title">Contact Info</h3>
                <ul>
                    <li>
                        <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <span class="text">{{ $info->phone ?? 'Your Phone' }}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <span class="text">{{ $info->email ?? 'Your Email' }}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <span class="text">{{ $info->adress ?? 'Your Address' }}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <span class="text">{{ $info->city ?? 'Your City' }}</span>
                    </li>
                </ul>
            </div>
            <div class="contactInfo project">
                @if($projects->count())    
                    <h3 class="title">PROJECTS</h3>
                    @foreach($projects as $project)
                        <h6>{{ $project->title }}</h6>
                        <p>{{ $project->description }}</p>
                    @endforeach
                @endif    
            </div>
            <div class="contactInfo project">
                <h3 class="title">LANGUAGES</h3>
                <ul>
                    @foreach($languages as $lang)
                        <li>{{ $lang->language }} : {{ $lang->proficiency }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="right_Side">
            <div class="about">
                <h2 class="title2">Profile</h2>
                <p>{{ $profile->profile }}</p>
            </div>
            <div class="about">
                <h2 class="title2">Education</h2>
                @foreach($educations as $edu)
                <div class="box">
                    <div class="year_company">
                        <h5>{{ \Carbon\Carbon::parse($edu->from_year)->format('Y') }} - {{ $edu->to_year ? \Carbon\Carbon::parse($edu->to_year)->format('Y') : 'Present' }}</h5>
                        <h5>{{ $edu->specialite }}</h5>
                    </div>
                    <div class="text">
                        <h4>{{ $edu->name }}</h4>
                        <p>{{ $edu->degree }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @if($experiences->count())
                <div class="about">
                    <h2 class="title2">Experience</h2>
                    @foreach($experiences as $exp)
                    <div class="box">
                        <div class="year_company">
                            <h5>{{ \Carbon\Carbon::parse($exp->start_date)->format('Y') }} - {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('Y') : 'Present' }}</h5>
                            <h5>{{ $exp->company_name }}</h5>
                        </div>
                        <div class="text">
                            <h4>{{ $exp->name }}</h4>
                            <p>{{ $exp->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
            @if($skills->count())
                <div class="about skills">
                    <h2 class="title2 title-skill">Professional Skills</h2>
                    @foreach($skills as $skill)
                        <div style="margin-bottom: 12px;">
                            <strong style="display:block;">{{ $skill->name }}</strong>
                            <div style="width:100%; height:10px; background:#ccc; border-radius:4px;">
                                <div style="width:{{ $skill->level * 20 }}%; height:10px; background:#800b0d;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>

</html>
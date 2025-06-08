<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

    <div class="p-6">
        <h1 class="text-2xl font-bold text-blue-900 mb-4">Course Management</h1>

        <!-- Add Course Button -->
        <button 
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700" 
            onclick="toggleModal(true)"
        >
            Add Course
        </button>

        <!-- Table -->
        <div class="mt-6">
            <table class="table-auto w-full border-collapse border border-blue-600">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="border border-blue-600 px-4 py-2">Course Name</th>
                        <th class="border border-blue-600 px-4 py-2">Level</th>
                        <th class="border border-blue-600 px-4 py-2">Term</th>
                        <th class="border border-blue-600 px-4 py-2">Total Students</th>
                        <th class="border border-blue-600 px-4 py-2">Section Head</th>
                    </tr>
                </thead>
                <tbody id="courseTableBody" class="bg-white text-blue-900"></tbody>
            </table>
        </div>

        <!-- Bar Graphs -->
        <div class="mt-8 flex flex-wrap justify-between">
            <div class="w-1/3 p-2">
                <canvas id="courseChart" class="bg-white rounded shadow p-4"></canvas>
            </div>
            <div class="w-1/3 p-2">
                <canvas id="levelChart" class="bg-white rounded shadow p-4"></canvas>
            </div>
            <div class="w-1/3 p-2">
                <canvas id="termChart" class="bg-white rounded shadow p-4"></canvas>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="courseModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-blue-100 p-6 rounded-md shadow-md w-96">
            <h2 class="text-xl font-bold text-blue-900 mb-4">Add Course</h2>
            <form id="courseForm">
                <div class="mb-4">
                    <label class="block text-blue-900 font-bold mb-1">Course Name:</label>
                    <input type="text" id="courseName" class="w-full border border-blue-600 rounded px-3 py-2 focus:outline-none">
                </div>
                <div class="mb-4">
                    <label class="block text-blue-900 font-bold mb-1">Level:</label>
                    <select id="courseLevel" class="w-full border border-blue-600 rounded px-3 py-2 focus:outline-none">
                        <option value="Diploma">Diploma</option>
                        <option value="Craft Certificate">Craft Certificate</option>
                        <option value="Higher Diploma">Higher Diploma</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-blue-900 font-bold mb-1">Term:</label>
                    <input type="text" id="courseTerm" class="w-full border border-blue-600 rounded px-3 py-2 focus:outline-none">
                </div>
                <div class="mb-4">
                    <label class="block text-blue-900 font-bold mb-1">Total Students:</label>
                    <input type="number" id="totalStudents" class="w-full border border-blue-600 rounded px-3 py-2 focus:outline-none">
                </div>
                <div class="mb-4">
                    <label class="block text-blue-900 font-bold mb-1">Section Head:</label>
                    <input type="text" id="sectionHead" class="w-full border border-blue-600 rounded px-3 py-2 focus:outline-none">
                </div>
                <div class="flex justify-end">
                    <button type="button" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mr-2" onclick="addCourse()">Save</button>
                    <button type="button" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700" onclick="toggleModal(false)">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let courses = [];
        let courseChart = null, levelChart = null, termChart = null;

        function toggleModal(show) {
            document.getElementById('courseModal').classList.toggle('hidden', !show);
        }

        function addCourse() {
            const name = document.getElementById('courseName').value;
            const level = document.getElementById('courseLevel').value;
            const term = document.getElementById('courseTerm').value;
            const students = parseInt(document.getElementById('totalStudents').value);
            const head = document.getElementById('sectionHead').value;

            if (name && level && term && students && head) {
                courses.push({ name, level, term, students, head });
                updateTable();
                updateCharts();
                toggleModal(false);
                document.getElementById('courseForm').reset();
            } else {
                alert('Please fill in all fields.');
            }
        }

        function updateTable() {
            const tbody = document.getElementById('courseTableBody');
            tbody.innerHTML = '';
            courses.forEach(course => {
                const row = `
                    <tr>
                        <td class="border border-blue-600 px-4 py-2">${course.name}</td>
                        <td class="border border-blue-600 px-4 py-2">${course.level}</td>
                        <td class="border border-blue-600 px-4 py-2">${course.term}</td>
                        <td class="border border-blue-600 px-4 py-2">${course.students}</td>
                        <td class="border border-blue-600 px-4 py-2">${course.head}</td>
                    </tr>`;
                tbody.innerHTML += row;
            });
        }

        function updateCharts() {
            const courseData = courses.map(course => course.name);
            const courseCounts = courses.map(course => course.students);
            const levelCounts = courses.reduce((acc, course) => {
                acc[course.level] = (acc[course.level] || 0) + course.students;
                return acc;
            }, {});
            const termCounts = courses.reduce((acc, course) => {
                acc[course.term] = (acc[course.term] || 0) + course.students;
                return acc;
            }, {});

            const levelLabels = Object.keys(levelCounts);
            const levelData = Object.values(levelCounts);

            const termLabels = Object.keys(termCounts);
            const termData = Object.values(termCounts);

            const colors = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40"];

            if (courseChart) courseChart.destroy();
            if (levelChart) levelChart.destroy();
            if (termChart) termChart.destroy();

            courseChart = new Chart(document.getElementById('courseChart'), {
                type: 'bar',
                data: {
                    labels: courseData,
                    datasets: [{
                        label: 'Total Students by Course',
                        data: courseCounts,
                        backgroundColor: colors,
                        borderColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            levelChart = new Chart(document.getElementById('levelChart'), {
                type: 'bar',
                data: {
                    labels: levelLabels,
                    datasets: [{
                        label: 'Total Students by Level',
                        data: levelData,
                        backgroundColor: colors,
                        borderColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            termChart = new Chart(document.getElementById('termChart'), {
                type: 'bar',
                data: {
                    labels: termLabels,
                    datasets: [{
                        label: 'Total Students by Term',
                        data: termData,
                        backgroundColor: colors,
                        borderColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }
    </script>

</body>
</html>

<script>
    const datatable = new window.simpleDatatables.DataTable("#demo-table", {
        perPageSelect: [10, 100, 1000, 10000, ["All", -1]],
        perPage: 10,
        data: {
            "headings": ["Name", "Ext.", "City", "Start Date", "Completion"],
            "data": [
                [
                    "Unity Pugh",
                    9958, "Curicó", "2005/02/11", "37%"
                ],
                [
                    "Theodore Duran",
                    8971, "Dhanbad", "1999/04/07", "97%"
                ],
                [
                    "Kylie Bishop",
                    3147, "Norman", "2005/09/08", "63%"
                ],
                [
                    "Willow Gilliam",
                    3497, "Amqui", "2009/29/11", "30%"
                ],
            ]
        }
    })
    document.getElementById("add").addEventListener("click", _event => {
        datatable.insert({
            data: structuredClone(datatable.options.data.data)
        })
    })

    
    /* document.getElementById("print").addEventListener("click", () => datatable.print()) */
    
    /*
    const setCheckboxes = function() {
        inputs = []
        while (visible.length) {
            visible.pop()
        }
        while (hidden.length) {
            hidden.pop()
        }
        checkboxes.innerHTML = ""
        datatable.data.headings.forEach((heading, i) => {
            const checkbox = createElement("div", {
                class: "checkbox"
            })
            const input = createElement("input", {
                type: "checkbox",
                id: `checkbox-${i}`,
                name: "checkbox"
            })
            const label = createElement("label", {
                for: `checkbox-${i}`,
                html: heading.data
            })
            input.idx = i
            if (datatable.columns.visible(i)) {
                input.checked = true
                visible.push(i)
            } else {
                if (hidden.indexOf(i) < 0) {
                    hidden.push(i)
                }
            }
            checkbox.appendChild(input)
            checkbox.appendChild(label)
            checkboxes.appendChild(checkbox)
            inputs.push(input)
        })
        inputs.forEach(input => {
            input.onchange = function(_event) {
                if (input.checked) {
                    hidden.splice(hidden.indexOf(input.idx), 1)
                    visible.push(input.idx)
                } else {
                    visible.splice(visible.indexOf(input.idx), 1)
                    hidden.push(input.idx)
                }
                updateColumns()
            }
        })
    }

    datatable.on("datatable.init", () => {
        setCheckboxes()
    })
    */
   
    /*
    const generateTable = columns => {
        const tableData = {
            headings: [],
            data: []
        }

        columns.forEach(colum => tableData.headings.push(colum || ""))

        for (let i = 0; i < 100; i++) {
            const machineType = machineTypeIcons[Math.floor(Math.random() * machineTypeIcons.length)].name
            tableData.data.push([
                `Machine ${i}`,
                `${getMachineTypeIcon(machineType)} <span>${machineType}</span>`,
                `OEM ${i}`,
                `${new Date(+new Date() - Math.floor(Math.random() * 2592000000)).toISOString().slice(0, 19).replace("T", " ")}`
            ])
        }
        return tableData
    }
    */       
    
</script>


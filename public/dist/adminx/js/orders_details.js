$(function() {
    $('#example').DataTable(); 
    $('#DataTableone').DataTable(); 
  });

 //  **------checkbox**

$(function() {
    $("#select_all_checkbox").on("click", function() {
      $(this)
        .closest("table")
        .find("tbody :checkbox")
        .prop("checked", this.checked)
        .closest("tr")
        .toggleClass("selected", this.checked);
    });
  
    $("tbody :checkbox").on("click", function() {
      
      $(this)
        .closest("tr")
        .toggleClass("selected", this.checked);
  
      $(this).closest("table")
        .find("#select_all_checkbox")
        .prop("checked",
          $(this) 
            .closest("table")
            .find("tbody :checkbox:checked").length ==
            $(this)
              .closest("table")
              .find("tbody :checkbox").length
        );
    });
  });

// **------ Delivered**

$(function() {
    $("#select_all_delivered").on("click", function() {
      $(this)
        .closest("table")
        .find("tbody :checkbox")
        .prop("checked", this.checked)
        .closest("tr")
        .toggleClass("selected", this.checked);
    });
  
    $("tbody :checkbox").on("click", function() {
      
      $(this)
        .closest("tr")
        .toggleClass("selected", this.checked);
  
      $(this).closest("table")
        .find("#select_all_delivered")
        .prop("checked",
          $(this) 
            .closest("table")
            .find("tbody :checkbox:checked").length ==
            $(this)
              .closest("table")
              .find("tbody :checkbox").length
        );
    });
  });

 //  **------Pickups**

$(function() {
    $("#select_all_pickups").on("click", function() {
      $(this)
        .closest("table")
        .find("tbody :checkbox")
        .prop("checked", this.checked)
        .closest("tr")
        .toggleClass("selected", this.checked);
    });
  
    $("tbody :checkbox").on("click", function() {
      
      $(this)
        .closest("tr")
        .toggleClass("selected", this.checked);
  
      $(this).closest("table")
        .find("#select_all_pickups")
        .prop("checked",
          $(this) 
            .closest("table")
            .find("tbody :checkbox:checked").length ==
            $(this)
              .closest("table")
              .find("tbody :checkbox").length
        );
    });
  });
  
      //  **------Returns**

$(function() {
      $("#select_all_returns").on("click", function() {
        $(this)
          .closest("table")
          .find("tbody :checkbox")
          .prop("checked", this.checked)
          .closest("tr")
          .toggleClass("selected", this.checked);
      });
    
      $("tbody :checkbox").on("click", function() {
        
        $(this)
          .closest("tr")
          .toggleClass("selected", this.checked);
    
        $(this).closest("table")
          .find("#select_all_returns")
          .prop("checked",
            $(this) 
              .closest("table")
              .find("tbody :checkbox:checked").length ==
              $(this)
                .closest("table")
                .find("tbody :checkbox").length
          );
      });
    });

     // **------ Cancelled **

$(function() {
      $("#select_all_cancelled").on("click", function() {
        $(this)
          .closest("table")
          .find("tbody :checkbox")
          .prop("checked", this.checked)
          .closest("tr")
          .toggleClass("selected", this.checked);
      });
    
      $("tbody :checkbox").on("click", function() {
        
        $(this)
          .closest("tr")
          .toggleClass("selected", this.checked);
    
        $(this).closest("table")
          .find("#select_all_cancelled")
          .prop("checked",
            $(this) 
              .closest("table")
              .find("tbody :checkbox:checked").length ==
              $(this)
                .closest("table")
                .find("tbody :checkbox").length
          );
      });
    });


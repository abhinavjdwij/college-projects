VERSION 5.00
Object = "{F9043C88-F6F2-101A-A3C9-08002B2F49FB}#1.2#0"; "COMDLG32.OCX"
Begin VB.Form frmEditEmp 
   BorderStyle     =   3  'Fixed Dialog
   Caption         =   "Edit Employee Wizard"
   ClientHeight    =   5580
   ClientLeft      =   45
   ClientTop       =   375
   ClientWidth     =   9315
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MDIChild        =   -1  'True
   MinButton       =   0   'False
   ScaleHeight     =   5580
   ScaleWidth      =   9315
   ShowInTaskbar   =   0   'False
   Begin VB.Frame Frame1 
      BackColor       =   &H00FFFFC0&
      BorderStyle     =   0  'None
      Height          =   5775
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   9615
      Begin VB.TextBox basic 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   435
         Left            =   2520
         TabIndex        =   16
         Top             =   3600
         Width           =   3135
      End
      Begin VB.ComboBox dept 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   435
         Left            =   2520
         TabIndex        =   15
         Text            =   "Select a Department"
         Top             =   2400
         Width           =   3135
      End
      Begin VB.OptionButton male 
         BackColor       =   &H00FFFFC0&
         Caption         =   "Male"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   495
         Left            =   2520
         TabIndex        =   8
         Top             =   4200
         Width           =   1095
      End
      Begin VB.OptionButton female 
         BackColor       =   &H00FFFFC0&
         Caption         =   "Female"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   495
         Left            =   4320
         TabIndex        =   7
         Top             =   4200
         Width           =   1335
      End
      Begin VB.TextBox fullname 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   2520
         TabIndex        =   6
         Top             =   1200
         Width           =   3135
      End
      Begin VB.TextBox contact 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   435
         Left            =   2520
         TabIndex        =   5
         Top             =   1800
         Width           =   3135
      End
      Begin VB.TextBox dsgn 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   435
         Left            =   2520
         TabIndex        =   4
         Top             =   3000
         Width           =   3135
      End
      Begin VB.CommandButton insert_img 
         BackColor       =   &H00C0FFC0&
         Caption         =   "Update Image"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   6240
         MaskColor       =   &H00000080&
         Style           =   1  'Graphical
         TabIndex        =   3
         Top             =   3480
         Width           =   2655
      End
      Begin VB.CommandButton update 
         BackColor       =   &H00C0FFC0&
         Caption         =   "Update"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   3000
         MaskColor       =   &H00000080&
         Style           =   1  'Graphical
         TabIndex        =   2
         Top             =   4800
         Width           =   2295
      End
      Begin VB.TextBox empID 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   2520
         TabIndex        =   1
         Top             =   600
         Width           =   3135
      End
      Begin MSComDlg.CommonDialog img_dialog 
         Left            =   5520
         Top             =   4800
         _ExtentX        =   847
         _ExtentY        =   847
         _Version        =   393216
      End
      Begin VB.Label basiclabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Basic Pay"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   17
         Top             =   3600
         Width           =   1815
      End
      Begin VB.Label fullnamelabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Name"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   14
         Top             =   1200
         Width           =   855
      End
      Begin VB.Label contactlabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Contact"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   13
         Top             =   1800
         Width           =   1215
      End
      Begin VB.Label deptlable 
         BackStyle       =   0  'Transparent
         Caption         =   "Department"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   12
         Top             =   2400
         Width           =   1815
      End
      Begin VB.Label dsgnlabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Designation"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   11
         Top             =   3000
         Width           =   1815
      End
      Begin VB.Label genderlable 
         BackStyle       =   0  'Transparent
         Caption         =   "Gender"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   10
         Top             =   4200
         Width           =   1815
      End
      Begin VB.Image empImg 
         BorderStyle     =   1  'Fixed Single
         Height          =   2655
         Left            =   6240
         Stretch         =   -1  'True
         Top             =   600
         Width           =   2655
      End
      Begin VB.Label empIDlabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Employee ID"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   9
         Top             =   600
         Width           =   1815
      End
   End
End
Attribute VB_Name = "frmEditEmp"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Dim fname, errreply, gender As String

Private Sub update_Click()
    If fullname.Text = "" Then
        errreply = MsgBox("Please Enter Employee's Name", vbCritical + vbOKOnly, "Error")
        fullname.SetFocus
    ElseIf contact.Text = "" Or (Not (IsNumeric(contact.Text))) Then
        errreply = MsgBox("Please Enter Employee's Valid Contact", vbCritical + vbOKOnly, "Error")
        contact.SetFocus
    ElseIf dept.Text = "Select a Department" Then
        errreply = MsgBox("Please Select Employee's Department", vbCritical + vbOKOnly, "Error")
        dept.SetFocus
    ElseIf dsgn.Text = "" Then
        errreply = MsgBox("Please Enter Employee's Designation", vbCritical + vbOKOnly, "Error")
        dsgn.SetFocus
    ElseIf basic.Text = "" Or (Not (IsNumeric(basic.Text))) Then
        errreply = MsgBox("Please Enter Employee's Valid Basic Pay", vbCritical + vbOKOnly, "Error")
        basic.SetFocus
    ElseIf fname = "" Then
        errreply = MsgBox("Please Insert New Employee's Image", vbCritical + vbOKOnly, "Error")
    Else
        Set rsEmp = Nothing
        Set rsEmp = New ADODB.Recordset
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        errreply = con.Execute("Delete * FROM emptable WHERE ID LIKE '" & empID.Text & "'")
        If male.Value = True Then
            gender = "Male"
        Else
            gender = "Female"
        End If
        Set rsEmp = Nothing
        Set rsEmp = New ADODB.Recordset
        Set rsEmp = con.Execute("INSERT INTO emptable VALUES('" & empID.Text & "','" & fullname.Text & "','" & gender & "','" & contact.Text & "','" & dept.Text & "','" & dsgn.Text & "','" & fname & "')")
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        Set rsPay = con.Execute("UPDATE paytable SET basic = '" & basic.Text & "' WHERE empID = '" & empID.Text & "'")
        errreply = MsgBox("Employee Information Updated", vbInformation + vbOKOnly, "Finished")
        Unload Me
        Set rsEmp = Nothing
        Set rsEmp = New ADODB.Recordset
    End If
End Sub

Private Sub Form_Load()
    dept.AddItem ("Software Engineer")
    dept.AddItem ("Hardware Engineer")
    dept.AddItem ("Staff Member")
    ' Disable all other inputs until ID is entered
    fullname.Enabled = False
    contact.Enabled = False
    dept.Enabled = False
    dsgn.Enabled = False
    insert_img.Enabled = False
    male.Enabled = False
    basic.Enabled = False
    female.Enabled = False
    update.Enabled = False
End Sub

Private Sub insert_img_Click()
    'Open Dialog Box
    empImg.Picture = Nothing
    With img_dialog
        .DialogTitle = "Open Image File...."
        .Filter = "Image Files (*.gif; *.bmp)| *.gif;*.bmp"
        .CancelError = False
         .ShowOpen
        If .FileName = "" Then
         empImg.Picture = Nothing
       Else
         fname = .FileName
         empImg.Picture = LoadPicture(.FileName)
       End If
    End With
End Sub

Private Sub empID_KeyPress(KeyAscii As Integer)
    If KeyAscii = 13 Then
        Set rsEmp = Nothing
        Set rsEmp = New ADODB.Recordset
        errreply = "SELECT * FROM emptable WHERE ID LIKE '" & empID.Text & "'"
        rsEmp.Open errreply, con, adOpenForwardOnly, adLockOptimistic
        If rsEmp.EOF = True Then
            errreply = MsgBox("Invalid Employee ID", vbExclamation + vbOKOnly, "Error")
            empID.SetFocus
        Else
            empID.Enabled = False
            fullname.Text = rsEmp!fullname
            contact.Text = rsEmp!contact
            dept.Text = rsEmp!Department
            dsgn.Text = rsEmp!Designation
            Set rsPay = Nothing
            Set rsPay = New ADODB.Recordset
            errreply = "SELECT basic FROM paytable WHERE empID LIKE '" & empID.Text & "'"
            rsPay.Open errreply, con, adOpenForwardOnly, adLockOptimistic
            basic.Text = rsPay!basic
            If rsEmp!gender = "Male" Then
                male.Value = True
            Else
                female.Value = True
            End If
            fname = rsEmp!Picture
            empImg.Picture = LoadPicture(fname)
            ' Enable all other inputs now
            fullname.Enabled = True
            contact.Enabled = True
            dept.Enabled = True
            dsgn.Enabled = True
            insert_img.Enabled = True
            male.Enabled = True
            female.Enabled = True
            update.Enabled = True
            basic.Enabled = True
        End If
        Set rsEmp = Nothing
        Set rsEmp = New ADODB.Recordset
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
    End If
End Sub

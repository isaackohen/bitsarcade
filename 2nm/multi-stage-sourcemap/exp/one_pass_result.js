(function () {
    var a, c, d, e, f, g = {}.hasOwnProperty, b = function (a, b) {
            function d() {
                this.constructor = a;
            }
            for (var c in b)
                g.call(b, c) && (a[c] = b[c]);
            return d.prototype = b.prototype, a.prototype = new d(), a.__super__ = b.prototype, a;
        };
    a = function () {
        function a(a) {
            this.name = a;
        }
        return a.prototype.move = function (a) {
            return console.log(this.name + (' moved ' + a + 'm.'));
        }, a;
    }(), d = function (c) {
        function a() {
            return a.__super__.constructor.apply(this, arguments);
        }
        return b(a, c), a.prototype.move = function () {
            return console.log('Slithering...'), a.__super__.move.call(this, 5);
        }, a;
    }(a), c = function (c) {
        function a() {
            return a.__super__.constructor.apply(this, arguments);
        }
        return b(a, c), a.prototype.move = function () {
            return console.log('Galloping...'), a.__super__.move.call(this, 45);
        }, a;
    }(a), e = new d('Sammy the Python'), f = new c('Tommy the Palomino'), e.move(), f.move();
}.call(this));
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4vb3JpZ2luLmNvZmZlZSJdLCJuYW1lcyI6WyJhIiwiYyIsImQiLCJlIiwiZiIsImciLCJoYXNPd25Qcm9wZXJ0eSIsImIiLCJjb25zdHJ1Y3RvciIsImNhbGwiLCJwcm90b3R5cGUiLCJfX3N1cGVyX18iLCJuYW1lIiwibW92ZSIsImNvbnNvbGUiLCJsb2ciLCJhcHBseSIsImFyZ3VtZW50cyJdLCJtYXBwaW5ncyI6IkFBQUEsQ0FBQyxZQUFXO0FBQUEsSUFDVixJQUFJQSxDQUFKLEVBQVlDLENBQVosRUFBbUJDLENBQW5CLEVBQTBCQyxDQUExQixFQUErQkMsQ0FBL0IsRUFDRUMsQ0FBQSxHQUFZLEdBQUdDLGNBRGpCLEVBRUVDLENBQUEsR0FBWSxVQUFTUCxDQUFULEVBQWdCTyxDQUFoQixFQUF3QjtBQUFBLFlBQXlGLFNBQVNMLENBQVQsR0FBZ0I7QUFBQSxnQkFBRSxLQUFLTSxXQUFMLEdBQW1CUixDQUFuQixDQUFGO0FBQUEsYUFBekc7QUFBQSxZQUFFLFNBQVNDLENBQVQsSUFBZ0JNLENBQWhCO0FBQUEsZ0JBQThCRixDQUFBLENBQVVJLElBQVYsQ0FBZUYsQ0FBZixFQUF1Qk4sQ0FBdkIsQ0FBSixJQUFpQyxDQUFBRCxDQUFBLENBQU1DLENBQU4sSUFBYU0sQ0FBQSxDQUFPTixDQUFQLENBQWIsQ0FBakMsQ0FBNUI7QUFBQSxZQUE0TyxPQUFyR0MsQ0FBQSxDQUFLUSxTQUFMLEdBQWlCSCxDQUFBLENBQU9HLFMsRUFBV1YsQ0FBQSxDQUFNVSxTQUFOLEdBQWtCLElBQUlSLENBQUosRSxFQUFZRixDQUFBLENBQU1XLFNBQU4sR0FBa0JKLENBQUEsQ0FBT0csUyxFQUFrQlYsQ0FBUCxDQUE1TztBQUFBLFNBRnRDLENBRFU7QUFBQSxJQUtWQSxDQUFBLEdBQVUsWUFBVztBQUFBLFFBQ25CLFNBQVNBLENBQVQsQ0FBZ0JBLENBQWhCLEVBQXNCO0FBQUEsWUFDcEIsS0FBS1ksSUFBTCxHQUFZWixDQUFaLENBRG9CO0FBQUEsU0FESDtBQUFBLFFBU25CLE9BSkFBLENBQUEsQ0FBT1UsU0FBUCxDQUFpQkcsSUFBakIsR0FBd0IsVUFBU2IsQ0FBVCxFQUFpQjtBQUFBLFlBQ3ZDLE9BQU9jLE9BQUEsQ0FBUUMsR0FBUixDQUFZLEtBQUtILElBQUwsR0FBYSxhQUFZWixDQUFaLEdBQXFCLElBQXJCLENBQXpCLENBQVAsQ0FEdUM7QUFBQSxTLEVBSWxDQSxDQUFQLENBVG1CO0FBQUEsS0FBWixFLEVBYVRFLENBQUEsR0FBUyxVQUFTRCxDQUFULEVBQWlCO0FBQUEsUUFHeEIsU0FBU0QsQ0FBVCxHQUFpQjtBQUFBLFlBQ2YsT0FBT0EsQ0FBQSxDQUFNVyxTQUFOLENBQWdCSCxXQUFoQixDQUE0QlEsS0FBNUIsQ0FBa0MsSUFBbEMsRUFBd0NDLFNBQXhDLENBQVAsQ0FEZTtBQUFBLFNBSE87QUFBQSxRQVl4QixPQVhBVixDQUFBLENBQVVQLENBQVYsRUFBaUJDLENBQWpCLEMsRUFNQUQsQ0FBQSxDQUFNVSxTQUFOLENBQWdCRyxJQUFoQixHQUF1QixZQUFXO0FBQUEsWUFFaEMsT0FEQUMsT0FBQSxDQUFRQyxHQUFSLENBQVksZUFBWixDLEVBQ09mLENBQUEsQ0FBTVcsU0FBTixDQUFnQkUsSUFBaEIsQ0FBcUJKLElBQXJCLENBQTBCLElBQTFCLEVBQWdDLENBQWhDLENBQVAsQ0FGZ0M7QUFBQSxTLEVBSzNCVCxDQUFQLENBWndCO0FBQUEsS0FBbEIsQ0FjTEEsQ0FkSyxDLEVBZ0JSQyxDQUFBLEdBQVMsVUFBU0EsQ0FBVCxFQUFpQjtBQUFBLFFBR3hCLFNBQVNELENBQVQsR0FBaUI7QUFBQSxZQUNmLE9BQU9BLENBQUEsQ0FBTVcsU0FBTixDQUFnQkgsV0FBaEIsQ0FBNEJRLEtBQTVCLENBQWtDLElBQWxDLEVBQXdDQyxTQUF4QyxDQUFQLENBRGU7QUFBQSxTQUhPO0FBQUEsUUFZeEIsT0FYQVYsQ0FBQSxDQUFVUCxDQUFWLEVBQWlCQyxDQUFqQixDLEVBTUFELENBQUEsQ0FBTVUsU0FBTixDQUFnQkcsSUFBaEIsR0FBdUIsWUFBVztBQUFBLFlBRWhDLE9BREFDLE9BQUEsQ0FBUUMsR0FBUixDQUFZLGNBQVosQyxFQUNPZixDQUFBLENBQU1XLFNBQU4sQ0FBZ0JFLElBQWhCLENBQXFCSixJQUFyQixDQUEwQixJQUExQixFQUFnQyxFQUFoQyxDQUFQLENBRmdDO0FBQUEsUyxFQUszQlQsQ0FBUCxDQVp3QjtBQUFBLEtBQWxCLENBY0xBLENBZEssQyxFQWdCUkcsQ0FBQSxHQUFNLElBQUlELENBQUosQ0FBVSxrQkFBVixDLEVBRU5FLENBQUEsR0FBTSxJQUFJSCxDQUFKLENBQVUsb0JBQVYsQyxFQUVORSxDQUFBLENBQUlVLElBQUosRSxFQUVBVCxDQUFBLENBQUlTLElBQUosR0F4RFU7QUFBQSxDQUFaLENBMERHSixJQTFESCxDQTBEUSxJQTFEUiJ9